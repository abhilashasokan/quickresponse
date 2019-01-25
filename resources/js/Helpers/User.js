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
            AppStorage.store(username,access_token)
        }
        
        Token.payload(res.data.access_token);
    }

    hasToken() {
        const storedToken = AppStorage.getToken();
        if(storedToken) {
            return Token.isValid(storedToken) ? true : false
        }
        return false
    }

    loggedIn() {
        return this.hasToken()
    }

    logout() {
        AppStorage.clear()
    }

    name() {
        if(this.loggedIn()) {
            return AppStorage.getUser()
        }
    }

    if() {
        if(this.loggedIn()) {
            const payload = Token.payload(AppStorage.getToken())
            return payload.sub
        }
    }

}

export default User = new User();