// Show the selected form and hide others
function showForm(formId) {
    // Hide all forms
    const forms = document.querySelectorAll('.form-container');
    forms.forEach(form => form.style.display = 'none');
  
    // Show the selected form
    const form = document.getElementById(formId);
    form.style.display = 'block';
  }
  
  // Handle form submission
  function handleFormSubmit(formType) {
    event.preventDefault();
    alert(formType + ' form submitted!');
    // Optionally, handle AJAX submission here.
  }
  
  // Listen to sidebar navigation clicks
  const links = document.querySelectorAll('.sidebar a');
  links.forEach(link => {
    link.addEventListener('click', function (event) {
      event.preventDefault();
      const formId = this.getAttribute('href').substring(1); // Get formId from href (remove '#')
      showForm(formId);
    });
  });
  
  // Initially show the first form (User Form)
  showForm('userForm');
  