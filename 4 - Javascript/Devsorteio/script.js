function randomNumber() {
  const min = Math.ceil(document.querySelector(".inputMin").value);
  const max = Math.floor(document.querySelector(".inputMax").value);

 const result = Math.floor(Math.random() * (max - min + 1) + min); // The maximum is inclusive and the minimum is inclusive
    alert(result);

}
