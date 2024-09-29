// Selecting elements with proper class names and IDs
const convertButton = document.querySelector(".convertButton");
const currencySelect = document.querySelector(".currency-select");
const currencySelect1 = document.querySelector(".currency-select1"); // Modified: Selecting the first select dropdown

function convertValues() {
  const inputCurrencyValue = document.querySelector(".input-currency").value;
  const currencyValueToconvert = document.querySelector(".currency-value-to-convert" ); // Valor em real
  const currencyValueConverted = document.querySelector(".currency-value");

  const realToday=1;
  const dolarToday = 5.2;
  const euroToday = 6.2;
  const libraToday = 8.3;
  const bitcoinToday = 62000;

  // Convert "Converter para" value based on the selected option in currencySelect
  if (currencySelect.value == "dollar") { // se o valor é dolar ele entra aqui
    currencyValueConverted.innerHTML = new Intl.NumberFormat("en-US", {
        style: "currency",
        currency: "USD"
      }).format(inputCurrencyValue / dolarToday);
  }
  else if (currencySelect.value == "euro") {
    currencyValueConverted.innerHTML = new Intl.NumberFormat("de-DE", {
        style: "currency",
        currency: "EUR"
      }).format(inputCurrencyValue / euroToday);
  }
  else if (currencySelect.value == "libra") {
    currencyValueConverted.innerHTML = new Intl.NumberFormat("en-GB", {
        style: "currency",
        currency: "GBP"
      }).format(inputCurrencyValue / libraToday);
  }
  else if (currencySelect.value == "bitcoin") {
    currencyValueConverted.innerHTML = new Intl.NumberFormat("de-DE", {
        style: "currency",
        currency: "BTC",
        maximumFractionDigits: 8 // Use up to 8 decimal places for Bitcoin
      }).format(inputCurrencyValue / bitcoinToday);
  }  
  else if (currencySelect.value == "real") {
    currencyValueConverted.innerHTML = new Intl.NumberFormat("pt-BR", {
        style: "currency",
        currency: "BRL",
      }).format(inputCurrencyValue / realToday);
  }

  // Always update the "Valor em real" field with the BRL format
  currencyValueToconvert.innerHTML = new Intl.NumberFormat("pt-BR", {
    style: "currency",
    currency: "BRL",
  }).format(inputCurrencyValue);
}

// Function to change the displayed name and image for the "Converter para" dropdown
function changeCurrency() {
  const currencyName = document.getElementById("currency-name");
  const currencyImage = document.querySelector(".currency-img");

  if (currencySelect.value === "dollar") {
      currencyName.innerHTML = "Dolar americano";
      currencyImage.src = "./assets/dollar.png";
  }
  else if (currencySelect.value === "euro") {
      currencyName.innerHTML = "Euro";
      currencyImage.src = "./assets/euro.png";
  }
  else if (currencySelect.value === "libra") {
    currencyName.innerHTML = "Libra";
    currencyImage.src = "./assets/libra.png";
  }
  else if (currencySelect.value === "bitcoin") {
    currencyName.innerHTML = "Bitcoin";
    currencyImage.src = "./assets/bitcoin.png";
  } 
  else if (currencySelect.value === "real") {
    currencyName.innerHTML = "Real";
    currencyImage.src = "./assets/Real.png";
  }

  convertValues(); // Ensure values are updated after changing the currency
}

// Function to change the displayed name and image for the "Converter de" dropdown
function changeCurrency1() {
  const currencyName1 = document.getElementById("currency-name1"); // Select the newly added currency-name1 element
  const currencyImage1 = document.querySelector(".currency-image1");

  if (currencySelect1.value === "dollar1") {
      currencyName1.innerHTML = "Dolar americano";
      currencyImage1.src = "./assets/dollar.png";
  }
  else if (currencySelect1.value === "euro1") {
      currencyName1.innerHTML = "Euro";
      currencyImage1.src = "./assets/euro.png";
  }
  else if (currencySelect1.value === "libra1") {
    currencyName1.innerHTML = "Libra";
    currencyImage1.src = "./assets/libra.png";
  }
  else if (currencySelect1.value === "bitcoin1") {
    currencyName1.innerHTML = "Bitcoin";
    currencyImage1.src = "./assets/bitcoin.png";
  } 
  else if (currencySelect1.value === "real1") {
    currencyName1.innerHTML = "Real";
    currencyImage1.src = "./assets/Real.png";
  }
  convertValues(); // Ensure values are updated after changing the currency
}

// Add event listeners for both dropdowns
currencySelect1.addEventListener("change", changeCurrency1); // Modified: Listening for changes in the "Converter de" dropdown
currencySelect.addEventListener("change", changeCurrency); // Listening for changes in the "Converter para" dropdown
convertButton.addEventListener("click", convertValues); // Listening for click on the convert button
