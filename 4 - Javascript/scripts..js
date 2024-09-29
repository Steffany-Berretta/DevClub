const convertButton = document.querySelector(".convertButton");
const currencySelect = document.querySelector(".currency-select");

function convertValues() {
  const inputCurrencyValue = document.querySelector(".input-currency").value;
  const currencyValueToconvert = document.querySelector(".currency-value-to-convert" ); // Valor  em  real

  const currencyValueconverted = document.querySelector(".currency-value");

  const dolarToday = 5.2;
  const euroToday = 6.2;

  
  if (currencySelect.value == "dollar"){
    currencyValueconverted.innerHTML = new Intl.NumberFormat("en-US", {
        style: "currency",
        currency: "USD",
      }).format(inputCurrencyValue / dolarToday)
  }

  if(currencySelect.value  == "euro"){
    currencyValueconverted.innerHTML = new Intl.NumberFormat("pt-PT", {
        style: "currency",
        currency: "EUR",
      }).format(inputCurrencyValue / euroToday)
  }



    currencyValueToconvert.innerHTML = new Intl.NumberFormat("pt-BR", {
      style: "currency",
      currency: "BRL",
    }).format(inputCurrencyValue);

  

  console.log(inputCurrencyValue);

}

convertButton.addEventListener("click", convertValues);
