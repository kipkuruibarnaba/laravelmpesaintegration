document.getElementById('getAccessToken').addEventListener('click', (event) => {
    event.preventDefault()
    axios.get('/get-token', {})
        .then((response) => {
            console.log(response.data);
            document.getElementById('accesstoken').innerHTML = response.data
        })
        .catch((error) => {
            console.log(error);
        })
})

document.getElementById('registerURLs').addEventListener('click', (event) => {
    event.preventDefault()
    axios.post('/registerUrl', {})
        .then((response) => {
            console.log(response);
            if (response.data.ResponseDescription) {
                document.getElementById('response').innerHTML = response.data.ResponseDescription
            } else {
                document.getElementById('response').innerHTML = response.data.errorMessage
            }
        })
        .catch((error) => {
            console.log(error);
        })
})

document.getElementById('simulatetransaction').addEventListener('click', (event) => {
    event.preventDefault()

    const requestBody = {
        amount: document.getElementById('amount').value,
        account: document.getElementById('account').value
    }

    axios.post('/simulate', requestBody)
        .then((response) => {
            console.log(response.data);

        })
        .catch((error) => {
            console.log(error);
        })
})

document.getElementById('stkpush').addEventListener('click', (event) => {
    event.preventDefault()

    const requestBody = {
        amount: document.getElementById('amount').value,
        account: document.getElementById('account').value,
        phone: document.getElementById('phone').value
    }

    axios.post('/stk-push-notification', requestBody)
        .then((response) => {
            console.log(response.data);

        })
        .catch((error) => {
            console.log(error);
        })
})