const sumbitFunction = (event) => {
  event.preventDefault();

  if (!formValidation()) {
    return;
  }

  alert(
    "Los datos que se enviarán son: \n" +
      "Nombre: " +
      document.getElementById("name").value +
      "\n" +
      "Apellido: " +
      document.getElementById("lastname").value +
      "\n" +
      "Documento: " +
      document.getElementById("document").value +
      "\n" +
      "Email: " +
      document.getElementById("email").value +
      "\n" +
      "Fecha de nacimiento: " +
      document.getElementById("birth").value +
      "\n" +
      "Teléfono: " +
      document.getElementById("phone").value +
      "\n" +
      "Género: " +
      document.getElementById("gender").value +
      "\n" +
      "Dirección: " +
      document.getElementById("address").value +
      "\n"
  );
};

document
  .getElementById("formulario")
  .addEventListener("submit", sumbitFunction);

function formValidation() {
  // Validación de campos de texto
  const fieldText = document.querySelectorAll('input[type="text"]');
  let validation = true;

  fieldText.forEach((field) => {
    let fieldError = document.getElementById(
      "error" + field.id.charAt(0).toUpperCase() + field.id.slice(1)
    );
    if (field.value.length === 0) {
      viewError(fieldError, "Este campo es requerido!!");
      validation = false;
    } else if (field.value.length < 3) {
      viewError(fieldError, "Este campo debe tener al menos 3 caracteres!!");
      validation = false;
    } else {
      noError(fieldError);
    }
  });

  // Validación de email
  const email = document.getElementById("email");
  let errorEmail = document.getElementById("errorEmail");

  if (email.value.length === 0) {
    viewError(errorEmail, "Este campo es requerido!!");
    validation = false;
  } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
    viewError(errorEmail, "Ingrese un email válido!");
    validation = false;
  } else {
    noError(errorEmail);
  }

  // Validación de documento y teléfono
  const documentid = document.getElementById("document");
  let errorDocument = document.getElementById("errorDocument");
  const phone = document.getElementById("phone");
  let errorPhone = document.getElementById("errorPhone");

  const phoneNumbers = /^09\d{7}$/;
  const documentNumbers = /^\d{8}(\.\d+)?$/;

  if (phone.value.length === 0) {
    viewError(errorPhone, "Este campo es requerido!!");
    validation = false;
  } else if (!phoneNumbers.test(phone.value)) {
    viewError(errorPhone, "Ingrese un número válido!!");
    validation = false;
  } else {
    noError(errorPhone);
  }

  if (documentid.value.length === 0) {
    viewError(errorDocument, "Este campo es requerido!!");
    validation = false;
  } else if (!documentNumbers.test(documentid.value)) {
    viewError(errorDocument, "Ingrese un documento válido!!");
    validation = false;
  } else {
    noError(errorDocument);
  }

  // Validación de género
  const gender = document.getElementById("gender");
  const errorGender = document.getElementById("errorGender");

  if (gender.value === "") {
    viewError(errorGender, "Este campo es requerido!!");
    validation = false;
  } else {
    noError(errorGender);
  }

  // Validación de checkbox (Términos y Condiciones)
  const terms = document.getElementById("acceptTerms");
  const errorTerms = document.getElementById("errorTerms");

  if (!terms.checked) {
    viewError(errorTerms, "Se debe aceptar los términos y condiciones");
    validation = false;
  } else {
    noError(errorTerms);
  }

  return validation;
}

// Funciones para mostrar/ocultar errores
const viewError = (element, message) => {
  element.textContent = message;
  element.style.display = "block";
};

const noError = (element) => {
  element.textContent = "";
  element.style.display = "none";
};
