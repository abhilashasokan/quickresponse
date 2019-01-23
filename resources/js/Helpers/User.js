import Token from "./Token";
import AppStorage from "./AppStorage";

class User {
    login(data) {
        axios
            .post("api/auth/login", data)
            .then(res => this.responseAfterLogin(res))
            .catch(function (error) {
                console.log(error);
            })
            .then(function () {
                //console.log('login process completed');
            });
    }

    responseAfterLogin(res) {
        const access_token = res.data.access_token
        const username = res.data.user
        if(Token.isValid(access_token)) {
            console.log(access_token);
            AppStorage.store(username,access_token)
        }
        
        Token.payload(res.data.access_token);
    }
}

export default User = new User();