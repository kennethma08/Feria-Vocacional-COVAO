$(document).ready(function() {
  var currentStep = 1;
  var totalSteps = $("#multiStepForm").find("div[id^='step']").length;

  $(".next-step").click(function() {
    if (currentStep < totalSteps) {
      if (validateForm(currentStep)) {
        $("#step" + currentStep).hide();
        $(".progress-bar-circle").eq(currentStep - 1).addClass("active");
        $(".progress-bar-line").eq(currentStep - 1).addClass("active");
        currentStep++;
        $("#step" + currentStep).show();
      }
    }
  });

  $(".prev-step").click(function() {
    if (currentStep > 1) {
      $("#step" + currentStep).hide();
      $(".progress-bar-circle").eq(currentStep - 1).removeClass("active");
      $(".progress-bar-line").eq(currentStep - 2).removeClass("active");
      currentStep--;
      $("#step" + currentStep).show();
    }
  });

  // Update the visibility of checkmarks on progress bar
  function updateProgressBar() {
    $(".progress-bar-circle i").removeClass("bi-check-active");
    $(".progress-bar-circle.active i").addClass("bi-check-active");
  }

  updateProgressBar();
});

function showFormSections() {
  var selectElement = document.getElementById("acompanantes-select");
  var formSection1 = document.getElementById("form-section-1");

  // Hide all form sections initially
  formSection1.classList.remove("show");

  // Show the appropriate form section based on the selected option
  if (selectElement.value === "1") {
    formSection1.style.height = formSection1.scrollHeight + "px";
  }  else {
    formSection1.style.height = "0";
  }
}

function showFormColegio() {
  var selectElement = document.getElementById("colegios-select");
  var formSection1 = document.getElementById("colegio-form-section");

  // Hide all form sections initially
  formSection1.classList.remove("show");

  // Show the appropriate form section based on the selected option
  if (selectElement.value === "1") {
    formSection1.style.height = formSection1.scrollHeight + "px";
  }  else {
    formSection1.style.height = "0";
  }
}

const checkboxes = document.querySelectorAll('input[type="checkbox"]');

// Add event listener to each checkbox
checkboxes.forEach((checkbox) => {
  checkbox.addEventListener('change', (event) => {
    if (event.target.checked) {
      // If a checkbox is checked, uncheck all other checkboxes
      checkboxes.forEach((cb) => {
        if (cb !== event.target) {
          cb.checked = false;
        }
      });
    }
  });
});









function validateForm(step) {
  if (step === 1) {
    // Validate first part of the form
    var nombre = document.getElementById("nombre").value;
    var apellido1 = document.getElementById("apellido1").value;
    var apellido2 = document.getElementById("apellido2").value;
    var direccion = document.getElementById("direccion").value;
    var cedula = document.getElementById("cedula").value;
    var correoElectronico = document.getElementById("correoElectronico").value;
    var numeroTelefono = document.getElementById("numeroTelefono").value;

    if (
      nombre === "" ||
      apellido1 === "" ||
      apellido2 === "" ||
      direccion === "" ||
      cedula === "" ||
      correoElectronico === "" ||
      numeroTelefono === ""
    ) {
      alert("Favor llenar todos los campos vacíos");
      return false;
    }

    if (!/^\d{8,}$/.test(cedula)) {
      alert("Favor ingresar un numero de cedula valido");
      return false;
    }

    if (!/\S+@\S+\.\S+/.test(correoElectronico)) {
      alert("Favor ingrese un correo electronico valido");
      return false;
    }

    if (!/^\d{8,}$/.test(numeroTelefono)) {
      alert("Favor ingrese un numero de telefono valido");
      return false;
    }
  } else if (step === 2) {
    // Validate second part of the form
    var selectElement = document.getElementById("acompanantes-select");
    if (selectElement.value === "default") {
      alert("Favor seleccionar una opcion");
      return false;
    }

    if (selectElement.value === "0") {
      return true; // No validation needed for option 0 (Sin acompañantes)
    }

    if (selectElement.value === "1") {
      var formSection1 = document.getElementById("form-section-1");
      var textInput = formSection1.querySelector('input[type="text"]');
      if (textInput && textInput.value === "") {
        alert("Favor llenar el campo adicional");
        return false;
      }
    }
  } else if (step === 3) {
    // Validate third part of the form
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    var checked = false;
    checkboxes.forEach(function(checkbox) {
      if (checkbox.checked) {
        checked = true;
      }
    });

    if (!checked) {
      alert("Favor seleccionar un bloque");
      return false;
    }
  }

  // If validation passes, return true
  return true;
}


function storeFormData() {
  // Retrieve data from step 1
  var nombre = document.getElementById("nombre").value;
  var apellido1 = document.getElementById("apellido1").value;
  var apellido2 = document.getElementById("apellido2").value;
  var cedula = document.getElementById("cedula").value;

  // Retrieve data from step 2
  var selectElement = document.getElementById("acompanantes-select");
  var opcionSeleccionada = selectElement.value;

  // Retrieve data from step 3
  var checkedCheckbox = document.querySelector('input[type="checkbox"]:checked');
  var selectedCheckLabel = checkedCheckbox ? checkedCheckbox.parentElement.innerText.trim() : '';

  // Store the data in session storage
  sessionStorage.setItem('nombre', nombre);
  sessionStorage.setItem('apellido1', apellido1);
  sessionStorage.setItem('apellido2', apellido2);
  sessionStorage.setItem('cedula', cedula);
  sessionStorage.setItem('opcionSeleccionada', opcionSeleccionada);
  sessionStorage.setItem('selectedCheckLabel', selectedCheckLabel);
}

function displayFormData() {
  // Retrieve data from session storage
  var nombre = sessionStorage.getItem('nombre');
  var apellido1 = sessionStorage.getItem('apellido1');
  var apellido2 = sessionStorage.getItem('apellido2');
  var cedula = sessionStorage.getItem('cedula');
  var opcionSeleccionada = sessionStorage.getItem('opcionSeleccionada');
  var selectedCheckLabel = sessionStorage.getItem('selectedCheckLabel');

  // Display the retrieved data
  var step4DataContainer = document.getElementById('step4-data-container');
  if (step4DataContainer) {
    step4DataContainer.innerHTML = `
      <p>${nombre} ${apellido1} ${apellido2}</p>
      <p>${cedula}</p>
      <p>${selectedCheckLabel}</p>
      <p>${opcionSeleccionada} acompañantes</p>
    `;
  }
}

function modalTrigger(){
  var modal = new bootstrap.Modal(document.getElementById('exitoModal'));
  modal.show();
}
