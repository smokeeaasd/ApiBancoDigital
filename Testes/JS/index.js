const Conta = require("./Conta.js");
const Correntista = require("./Correntista.js");

async function main() {
	let contas = await Conta.getContas(false);


	contas.forEach(async (c) => {
		let correntista = await Correntista.getCorrentistaByID(false, c.id_correntista);

		console.table([correntista]);
		console.table([c]);

	});
}

main();