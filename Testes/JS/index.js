const Conta = require("./Conta.js");
const Correntista = require("./Correntista.js");
const ChavePix = require("./ChavePix.js");
const Transacao = require("./Transacao.js");

async function main() {
	let correntista = await Correntista.addCorrentista("Lucas", "11918109911", "2005-10-10", "senhalegal");
	console.log(correntista);
}

main();