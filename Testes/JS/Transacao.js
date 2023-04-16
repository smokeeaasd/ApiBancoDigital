const { Axios } = require("axios");
const querystring = require("querystring");

class Transacao {
	static async getTransacoes() {
		const axios = new Axios({
			baseURL: "http://localhost:8000/api"
		});

		const req = await axios.get("transacao");

		return JSON.parse(req.data);
	}

	static async getTransacaoByID(id) {
		const axios = new Axios({
			baseURL: "http://localhost:8000/api"
		});

		const req = await axios.get("transacao/by-id?id=" + id);
		
		return JSON.parse(req.data);
	}

	static async getTransacaoByRemetente(id_remetente) {
		const axios = new Axios({
			baseURL: "http://localhost:8000/api"
		});

		const req = await axios.get(`transacao/by-remetente?id_remetente=${id_remetente}`);
		
		return JSON.parse(req.data);
	}

	static async getTransacaoByDestinatario(id_destinatario) {
		const axios = new Axios({
			baseURL: "http://localhost:8000/api"
		});

		const req = await axios.get(`transacao/by-destinatario?id_destinatario=${id_destinatario}`);
		
		return JSON.parse(req.data);
	}

	static async addTransacao(data_transacao, valor, id_remetente, id_destinatario) {
		const axios = new Axios({
			baseURL: "http://localhost:8000/api",
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		});

		const data = {
			data_transacao: data_transacao,
			valor: valor,
			id_remetente: id_remetente,
			id_destinatario: id_destinatario
		};

		const req = await axios.post("transacao/new", querystring.stringify(data));

		console.log(req.data);
	}
}

module.exports = Transacao