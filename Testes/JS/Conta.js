const { Axios } = require("axios");
const querystring = require("querystring");

class Conta {
	static async getContas(complete) {
		const axios = new Axios({
			baseURL: "http://localhost:8000/api"
		});

		const req = await axios.get("conta");

		return JSON.parse(req.data);
	}

	static async getContaByID(complete, id) {
		const axios = new Axios({
			baseURL: "http://localhost:8000/api"
		});

		const req = await axios.get("conta/by-id?id=" + id);
		
		return JSON.parse(req.data);
	}

	static async getContaByNumero(complete, numero) {
		const axios = new Axios({
			baseURL: "http://localhost:8000/api"
		});

		const req = await axios.get(`conta/by-numero?numero=${numero}`);
		
		return JSON.parse(req.data);
	}

	static async addConta(numero, tipo, senha, id_correntista) {
		const axios = new Axios({
			baseURL: "http://localhost:8000/api",
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		});

		const data = {
			numero: numero,
			tipo: tipo,
			id_correntista: id_correntista,
			senha: senha
		};

		const req = await axios.post("conta/new", querystring.stringify(data));

		console.log(req.data);
	}

	static async updateConta(id, numero, tipo, senha, id_correntista) {
		const axios = new Axios({
			baseURL: "http://localhost:8000/api",
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		});

		const data = {
			id: id,
			numero: numero,
			tipo: tipo,
			id_correntista: id_correntista,
			senha: senha
		};

		const req = await axios.post("conta/update", querystring.stringify(data));

		console.log(req.data);
	}
}

module.exports = Conta