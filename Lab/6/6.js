function calculate(operation) {
  const num1 = parseFloat(document.getElementById("num1").value);
  const num2 = parseFloat(document.getElementById("num2").value);
  let result = 0;

  switch (operation) {
    case "+":
      result = num1 + num2;
      break;
    case "-":
      result = num1 - num2;
      break;
    case "*":
      result = num1 * num2;
      break;
    case "/":
      result = num2 !== 0 ? num1 / num2 : "Error (div by 0)";
      break;
    case "^":
      result = Math.pow(num1, num2);
      break;
    case "sqrt":
      result = num1 >= 0 ? Math.sqrt(num1) : "Error (sqrt of neg)";
      break;
    case "square":
      result = Math.pow(num1, 2);
      break;
    default:
      result = "Invalid Operation";
  }

  document.getElementById("output").innerText = result;
}
