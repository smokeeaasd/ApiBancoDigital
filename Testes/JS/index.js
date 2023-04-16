const Conta = require("./Conta.js");
const Correntista = require("./Correntista.js");
const ChavePix = require("./ChavePix.js");
const Transacao = require("./Transacao.js");

async function main() {
	let transacao = await Transacao.addTransacao("2022-01-01", 250, 1, 2);

	console.log(transacao);
}

main();