function showSection(sectionId) {
  // Hide all sections
  var sections = document.getElementsByClassName('section');
  for (var i = 0; i < sections.length; i++) {
      sections[i].style.display = 'none';
  }

  // Show the selected section
  var section = document.getElementById(sectionId);
  if (section) {
      section.style.display = 'block';
  } else {
      console.error('Section with ID "' + sectionId + '" not found.');
  }
}
