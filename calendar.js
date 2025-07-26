const calendarElement = document.getElementById('calendar');
const monthYearElement = document.getElementById('monthYear');
const prevMonthButton = document.getElementById('prevMonth');
const nextMonthButton = document.getElementById('nextMonth');
const timeSlotsElement = document.getElementById('timeSlots');

let currentDate = new Date();
const today = new Date();
// Set maxDate to the last day of the third month from the current month
const maxDate = new Date(today.getFullYear(), today.getMonth() + 3, 0);

let selectedDateElement = null;

function updateCalendar() {
    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();
    const firstDayOfMonth = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    // Fetch the dates from the database
    fetch('get_calendar_dates.php?year=' + year + '&month=' + (month + 1))
        .then(response => response.json())
        .then(dates => {
            monthYearElement.textContent = currentDate.toLocaleDateString('en-US', { month: 'long', year: 'numeric' });
            calendarElement.innerHTML = ''; // Clear previous content

            // Add blank days for the first week
            for (let i = 0; i < firstDayOfMonth; i++) {
                const blankDay = document.createElement('div');
                blankDay.classList.add('calendar-day', 'blank-day');
                calendarElement.appendChild(blankDay);
            }

            // Add days for the current month
            for (let day = 1; day <= daysInMonth; day++) {
                const dayElement = document.createElement('div');
                const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                dayElement.textContent = day;
                dayElement.classList.add('calendar-day');

                const currentDateStr = today.toISOString().split('T')[0]; // Format as YYYY-MM-DD

                // Mark dates until today as 'booked'
                if (dateStr <= currentDateStr) {
                    dayElement.classList.add('booked');
                    dayElement.addEventListener('click', () => alert("This date is already booked."));
                }
                // Mark dates in the next two months as 'not released'
                else if (
                    (month == today.getMonth() + 1) ||  // Next month
                    (month == today.getMonth() + 2)    // Month after next
                ) {
                    dayElement.classList.add('not-released');
                    dayElement.addEventListener('click', () => alert("Darshan for this date has not been released."));
                }
                // Mark future dates beyond the next two months as 'available'
                else {
                    dayElement.classList.add('available');
                    dayElement.addEventListener('click', () => selectDate(dayElement, dateStr));
                }

                // If today or earlier in the current month, mark as 'booked', otherwise 'available'
                if (month === today.getMonth() && dateStr > currentDateStr) {
                    dayElement.classList.remove('booked');
                    dayElement.classList.add('available');
                    dayElement.addEventListener('click', () => selectDate(dayElement, dateStr));
                }

                calendarElement.appendChild(dayElement);
            }
        });
}

function selectDate(dayElement, dateStr) {
    if (selectedDateElement) {
        selectedDateElement.classList.remove('selected-date');
    }

    selectedDateElement = dayElement;
    selectedDateElement.classList.add('selected-date');

    document.getElementById('selectedDate').value = dateStr;

    displayTimeSlots(dateStr); // Only display time slots when an available date is clicked
}

function displayTimeSlots(dateStr) {
    timeSlotsElement.style.display = 'block'; // Show time slots
    const timeSlotElements = timeSlotsElement.querySelectorAll('.time-slot');
    timeSlotElements.forEach(slot => {
        slot.classList.remove('selected');
        slot.addEventListener('click', () => {
            selectTimeSlot(slot);
        });
    });

    alert(`You selected ${dateStr}. Choose a time slot.`);
}

function hideTimeSlots() {
    timeSlotsElement.style.display = 'none'; // Hide time slots
}

function selectTimeSlot(slot) {
    const timeSlotElements = timeSlotsElement.querySelectorAll('.time-slot');
    timeSlotElements.forEach(slot => {
        slot.classList.remove('selected');
    });

    slot.classList.add('selected');
    document.getElementById('selectedTime').value = slot.textContent;
}

prevMonthButton.addEventListener('click', () => {
    currentDate.setMonth(currentDate.getMonth() - 1);
    // Ensure we don't go back further than the current month
    if (currentDate < today) {
        currentDate = new Date(today);
    }
    updateCalendar();
});

nextMonthButton.addEventListener('click', () => {
    currentDate.setMonth(currentDate.getMonth() + 1);
    // Ensure we don't go forward beyond the maxDate
    if (currentDate > maxDate) {
        currentDate = new Date(maxDate);
    }
    updateCalendar();
});

document.getElementById('bookingForm').addEventListener('submit', function(event) {
    const selectedDate = document.getElementById('selectedDate').value;
    const selectedTimeSlot = document.getElementById('selectedTime').value;

    if (!selectedDate || !selectedTime) {
        event.preventDefault();
        alert("Please select a valid date and time slot before booking.");
    }
});

function validateForm() {
    const name = document.getElementById('name').value;
    const phone = document.getElementById('phone').value;
    const gender = document.getElementById('gender').value;
    const photoId = document.getElementById('photoId').value;
    const photoIdNo = document.getElementById('photoIdNo').value;
    const selectedDate = document.getElementById('selectedDate').value;
    const selectedTime = document.getElementById('selectedTime').value;

    if (!name || !phone || !gender || !photoId || !photoIdNo || !selectedDate || !selectedTime) {
        alert("Please fill in all required fields.");
        return false;
    }

    return true;
}

function updatePhotoIdInput() {
    const photoId = document.getElementById('photoId').value;
    const photoIdNo = document.getElementById('photoIdNo');

    if (photoId === "Aadhaar") {
        photoIdNo.pattern = "\\d{12}";
        photoIdNo.placeholder = "Enter 12 digit Aadhaar number";
    } else if (photoId === "PAN") {
        photoIdNo.pattern = "[A-Z0-9]{10}";
        photoIdNo.placeholder = "Enter 10 digit PAN number";
    }
}

// Initialize the calendar when the page loads
updateCalendar();
