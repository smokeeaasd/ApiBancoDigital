const { Axios } = require("axios");
const querystring = require("querystring");

class Correntista {

	static async getCorrentistas(complete) {
		const axios = new Axios({
			baseURL: "http://localhost:8000/api"
		});

		const req = await axios.get("correntista");

		return JSON.parse(req.data);
	}

	static async getCorrentistaByID(complete, id) {
		const axios = new Axios({
			baseURL: "http://localhost:8000/api"
		});

		const req = await axios.get("correntista/by-id?id=" + id);

		return JSON.parse(req.data);
	}

	static async getCorrentistaByCPFAndSenha(complete, cpf, senha) {
		const axios = new Axios({
			baseURL: "http://localhost:8000/api"
		});

		const req = await axios.get(`correntista/connect?cpf=${cpf}&senha=${senha}`);

		return JSON.parse(req.data);
	}

	static async addCorrentista(nome, cpf, data_nasc, senha) {
		const axios = new Axios({
			baseURL: "http://localhost:8000/api",
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		});

		const data = {
			nome: nome,
			cpf: cpf,
			data_nasc: data_nasc,
			senha: senha
		};

		const req = await axios.post("correntista/new", querystring.stringify(data));

		console.log(req.data);
		console.log();
	}

	static async updateCorrentista(id, nome, cpf, data_nasc, senha) {
		const axios = new Axios({
			baseURL: "http://localhost:8000/api",
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		});

		const data = {
			id: id,
			nome: nome,
			cpf: cpf,
			data_nasc: data_nasc,
			senha: senha
		};

		const req = await axios.post("correntista/update", querystring.stringify(data));

		console.log(req.data);
		console.log();
	}
}

module.exports = Correntista