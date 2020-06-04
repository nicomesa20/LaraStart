export default class Gate {
    constructor(user) {
        this.user = user;
    }

    isAdmin() {
        return this.user.role === 'admin';
    }
    isUser() {
        return this.user.role === 'user';
    }
    isAuthor() {
        return this.user.role === 'author';
    }
    isAdminOrAuthor() {
        if (this.user.role === 'admin' || this.user.role === 'author') {
            return true;
        }
    }
    isAuthorOrUser() {
        if (this.user.role === 'author' || this.user.role === 'user') {
            return true;
        }
    }
}