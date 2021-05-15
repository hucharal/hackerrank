'use strict';

process.stdin.resume();
process.stdin.setEncoding('utf-8');

let inputString = '';
let currentLine = 0;

process.stdin.on('data', inputStdin => {
  inputString += inputStdin;
});

process.stdin.on('end', _ => {
  inputString = inputString.replace(/\s*$/, '')
    .split('\n')
    .map(str => str.replace(/\s*$/, ''));

  main();
});

function readLine() {
  return inputString[currentLine++];
}

// Complete the plusMinus function below.
function plusMinus(listNumbers, totalNumbers) {
  let positiveNumbers = listNumbers.filter(n => n > 0);
  let negativeNumbers = listNumbers.filter(n => n < 0);
  let nullNumbers = listNumbers.filter(n => n === 0);

  console.log(calculateRatio(positiveNumbers.length, totalNumbers));
  console.log(calculateRatio(negativeNumbers.length, totalNumbers));
  console.log(calculateRatio(nullNumbers.length, totalNumbers));
}

function calculateRatio(number, total) {
  return Number(number / total).toPrecision(6);
}

function main() {
  const n = parseInt(readLine(), 10);

  const arr = readLine().split(' ').map(arrTemp => parseInt(arrTemp, 10));

  plusMinus(arr, n);
}

