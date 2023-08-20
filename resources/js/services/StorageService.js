const StorageService = {
    store(key, value) {
        localStorage.setItem(key, JSON.stringify(value))
    },

    read(key) {
        return localStorage.getItem(key) !== null ? JSON.parse(localStorage.getItem(key)) : null
    },

    delete(key) {
        localStorage.removeItem(key)
    },

    clear() {
        localStorage.clear()
    }
}

export {
    StorageService
}