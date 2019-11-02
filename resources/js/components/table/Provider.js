import Functions from './Functions';

export default class Provider extends Functions {
    fetchData(url, get_params) {
        get_params = this.buildUrlQuery(get_params);

        return axios.post(url + get_params, {}).then(res => {
            return res.data;
        });
    }
}