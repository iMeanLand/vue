export default class Provider {
    fetchData(url, get_params) {
        return axios.post(url + '?' + get_params, {}).then(res => {
            return res.data;
        });
    }

    sortBy(url, get_params) {
        return axios.post(url + '?' + get_params, {}).then(res => {
            return res.data;
        });
    }
}