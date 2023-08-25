const ErrorCheckingService = {
    isRequired: data => typeof data === 'string' ? !data.trim() : !data,
    isEmail: data => !/([a-zA-Z0-9.]+)@([a-zA-Z0-9.]+)\.([a-zA-Z.]+)/gi.test(data),
    isConfirmed: (confPasswdData, passwdData) => confPasswdData !== passwdData
}

const ErrorHandlingService = {
    setError(data, config) {
        const errors = []

        for (const field in data) {
            if (Object.hasOwn(config, field)) {
                const param = config[field]

                for (const paramKey in param) {
                    if (Object.hasOwn(ErrorCheckingService, paramKey)) {
                        const isError = field === "passwordConfirmation" ? ErrorCheckingService[paramKey](data['passwordConfirmation'], data['password']) : ErrorCheckingService[paramKey](data[field])

                        if (isError) {
                            errors.push({ name: field, message: param[paramKey].message })
                        }
                    }
                }
            }
        }

        return errors
    },

    existsError(errorsData, errorName) {
        return errorsData.find(e => e.name === errorName)
    }
}

export {
    ErrorHandlingService
}
