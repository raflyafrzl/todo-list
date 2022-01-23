const buttonGenerate = document.querySelector("#random");
const regexMail = document.getElementById("sub-btn");
const randomString =
  "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890-=!@#$%&*+_abcefghijklmnopqrstuvwxyz";
const regexPassword = document.getElementById("regexpassword");
const btnClose = document.getElementById("btn-close");
const hidePanel = document.querySelector(".hide");
buttonGenerate.addEventListener("click", generateRandom);
function generateRandom() {
  let temp = "";
  const panjang = Math.floor(Math.random() * (12 - 8 + 1) + 8);
  console.log("Test");
  for (let i = 0; i < panjang; i++) {
    const bilRandom = Math.trunc(Math.random() * randomString.length);
    temp += randomString[bilRandom];
  }
  //Regex
  const pattern = /[A-Z]+[a-z]+[0-9]{2,3}/g;
  const patternSymbol = /[-=!@#$%&*_+]{2}/;
  if (pattern.test(temp) && patternSymbol.test(temp)) {
    regexPassword.value = temp;
  } else {
    generateRandom();
  }
}



