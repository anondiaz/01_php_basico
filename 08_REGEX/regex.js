const regex0 = /[a-zA-Z]/;
let regex1 = /abc/i; // Coindice cualquier letra mayus/minus
const regex2 = new RegExp('abc');

regex1 = /a.c/i;
console.log(regex1.test('abc')); // true
console.log(regex1.test('a bc')); // false
console.log(regex1.test('aBc')); // true

regex1 = /a*c/i;
console.log(regex1.test('anc')); // true
console.log(regex1.test('aghbc')); // true
console.log(regex1.test('aBd')); // false

regex1 = /a+c/i;
console.log(regex1.test('ab33333c')); // false
console.log(regex1.test('fhfhgfdachfgh33')); // true
console.log(regex1.test('aBc')); // false

regex1 = /a?c/i;
console.log(regex1.test('ab33333c')); // true
console.log(regex1.test('ab33333')); // false
console.log(regex1.test('ca')); // true

regex1 = /a{2}c/i;
console.log(regex1.test('ab33333c')); // false
console.log(regex1.test('aac')); // true
console.log(regex1.test('abc')); // false

regex1 = /a{2,4}c/i;
console.log(regex1.test('ab33333c')); // false
console.log(regex1.test('aac')); // true
console.log(regex1.test('aaaaaac')); // true

regex1 = /[abc]/i;
console.log(regex1.test('ab33333c')); // true
console.log(regex1.test('aac')); // true
console.log(regex1.test('abc')); // true
console.log(regex1.test('a1b2c')); // true
console.log(regex1.test('qwe')); // false
console.log(regex1.test('asd')); // true

regex1 = /[a-z]/;
console.log(regex1.test('ç')); // false
console.log(regex1.test('Z')); // false
console.log(regex1.test('asd')); // true

regex1 = /[a-z\?]/;
console.log(regex1.test('?')); // true
console.log(regex1.test('Z')); // false
console.log(regex1.test('asd')); // true

string = "María"
regex1 = /[A-Z]/;
console.log(regex1.test(string)); // true

string = "MARIA";
regex1 = /[a-z]/;
console.log(regex1.test(string)); // false

string= "í"
regex1 = /[í]/
console.log(regex1.test(string)); // true

string = "María"
regex1 = /^[A-Z]{1}/;
console.log(regex1.test(string)); // true

string = "Ñaría"
regex1 = /^[A-ZÑÇ]{1}/;
console.log(regex1.test(string)); // true

string = "María"
regex1 = /^[A-ZÑÇ]{1}[a-zí]{2}$/;
console.log(regex1.test(string)); // false

string = "María"
regex1 = /^[A-ZÑÇ]{1}[a-zí]{4}$/;
console.log(regex1.test(string)); // true

string = "María"
regex1 = /^[A-ZÑÇ]{1}[a-zí]+$/;
console.log(regex1.test(string)); // true

string = "María de las Mercedes"
regex1 = /^[A-ZÑÇ]{1}[a-zí\s]+$/;
console.log(regex1.test(string)); // false

string = "María de las Mercedes"
regex1 = /^[A-ZÑÇ]{1}[A-Za-zí\s]+$/;
console.log(regex1.test(string)); // true

string = "Froilan de todo los santos"
regex1 = /^[A-ZÑÇ]{1}[A-Za-zí\s]+$/;
console.log(regex1.test(string)); // true

string = "Froilan de todo los santos"
regex1 = /\W/;
console.log(regex1.test(string)); // true



