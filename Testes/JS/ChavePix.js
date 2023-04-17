const { Axios } = require("axios");
const querystring = require("querystring");

class ChavePix {

	static async getChavesPix(complete) {
		const axios = new Axios({
			baseURL: "http://localhost:8000/api"
		});

		const req = await axios.get("chavepix");

		return JSON.parse(req.data);
	}

	static async getChavePixByID(complete, id) {
		const axios = new Axios({
			baseURL: "http://localhost:8000/api"
		});

		const req = await axios.get("chavepix/by-id?id=" + id);

		return JSON.parse(req.data);
	}

	static async getChavePixByConta(complete, id_conta) {
		const axios = new Axios({
			baseURL: "http://localhost:8000/api"
		});

		const req = await axios.get(`chavepix/by-conta?id_conta=${id_conta}`);

		return JSON.parse(req.data);
	}

	static async getChavePixByChave(complete, chave) {
		const axios = new Axios({
			baseURL: "http://localhost:8000/api"
		});

		const req = await axios.get(`chavepix/by-chave?chave=${chave}`);

		return JSON.parse(req.data);
	}

	static async addChavePix(tipo, chave, id_conta) {
		const axios = new Axios({
			baseURL: "http://localhost:8000/api",
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		});

		const data = {
			tipo: tipo,
			chave: chave,
			id_conta: id_conta
		};

		const req = await axios.post("chavepix/new", querystring.stringify(data));

		return req.data;
	}

	static async updateChavePix(id, chave, tipo, id_conta) {
		const axios = new Axios({
			baseURL: "http://localhost:8000/api",
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		});

		const data = {
			id: id,
			chave: chave,
			tipo: tipo,
			id_conta: id_conta
		};

		const req = await axios.post("chavepix/update", querystring.stringify(data));

		return req.data;
	}
}

module.exports = ChavePix