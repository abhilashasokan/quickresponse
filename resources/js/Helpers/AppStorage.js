class AppStorage {
    storeToken(token) {
        localStorage.setItem('AccessToken', token);
    }

    storeUser(user) {
        localStorage.setItem('user', user);
    }

    store(user, token) {
        this.storeToken(token);
        this.storeUser(user);
    }

    clear() {
        localStorage.removeItem('AccessToken');
        localStorage.removeItem('user');
    }

    getToken() {
        return localStorage.getItem('AccessToken');
    }

    getUser() {
        return localStorage.getItem('user');
    }
}

export default AppStorage =  new AppStorage();
