const { Axios } = require("axios");

async function getCorrentistas(complete)
{
    const axios = new Axios({
        baseURL: "http://localhost:8000/api"
    });

    const req = await axios.get("correntistas");

    console.log(complete ? req : req.data);
    console.log();
}

async function getCorrentistaByID(complete, id)
{
    const axios = new Axios({
        baseURL: "http://localhost:8000/api"
    });

    const req = await axios.get("correntista/by-id?id=" + id);

    console.log(complete ? req : req.data);
    console.log();
}


getCorrentistas(false);

getCorrentistaByID(false, 1);