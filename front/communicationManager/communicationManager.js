const URL = "http://localhost:8001/api"
export async function insertUser(dataUser) {
    return fetch(URL+'/register', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(dataUser)
    })
        .then(response => response.json())
        .then(data => {
            return data;
        })
        .catch(error => {
            console.error('Error:', error);
            throw error; // Opcional, para manejar el error si quieres propagarlo
        });
}

export async function authenticate(dataUser) {

    return fetch(URL+'/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            // 'Accept': 'application/json'
        },
        // credentials: 'include', // Incluye las cookies automáticamente
        body: JSON.stringify(dataUser)
    })
        .then(response => response.json())
        .then(data => {
            return data;
        })
        .catch(error => {
            console.error('Error:', error);
            throw error; // Opcional, para manejar el error si quieres propagarlo
        });
}

export async function createSetUpIntent(token) {
    try {
        const response = await fetch(URL + '/stripe/create-setup-intent', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            body: null // Este `body` puede omitirse, ya que no se está enviando ningún dato en el cuerpo
        });

        if (!response.ok) {
            throw new Error(`Error: ${response.status} - ${response.statusText}`);
        }

        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error:', error);
        throw error; // Propagamos el error para que pueda ser manejado en el nivel superior
    }
}

export async function addPaymentMethod(token, paymentMethod) {
    try {
        const response = await fetch(URL + '/stripe/add-payment-method', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            body: JSON.stringify({
                'paymentMethod': paymentMethod
            }) // Este `body` puede omitirse, ya que no se está enviando ningún dato en el cuerpo
        });

        if (!response.ok) {
            throw new Error(`Error: ${response.status} - ${response.statusText}`);
        }

        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error:', error);
        throw error; // Propagamos el error para que pueda ser manejado en el nivel superior
    }
}

export async function logout() {
    try {
        const response = await fetch(URL + '/logout');

        if (!response.ok) {
            throw new Error(`Error: ${response.status} - ${response.statusText}`);
        }

        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error:', error);
        throw error; // Propagamos el error para que pueda ser manejado en el nivel superior
    }
}

export async function setDefaultPaymentMethod(token, paymentMethodId) {
    // set-default-payment-method
    try {
        const response = await fetch(URL + '/stripe/set-default-payment-method', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            body: JSON.stringify({
                'payment_method_id': paymentMethodId
            }) // Este `body` puede omitirse, ya que no se está enviando ningún dato en el cuerpo
        });

        if (!response.ok) {
            throw new Error(`Error: ${response.status} - ${response.statusText}`);
        }

        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error:', error);
        throw error; // Propagamos el error para que pueda ser manejado en el nivel superior
    }
}

export async function retrievePaymentMethod(token){
// retrieve-payment-method
    try {
        const response = await fetch(URL + '/stripe/retrieve-payment-method', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            body: null
        });

        if (!response.ok) {
            throw new Error(`Error: ${response.status} - ${response.statusText}`);
        }

        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error:', error);
        throw error; // Propagamos el error para que pueda ser manejado en el nivel superior
    }
}

export async function getHomeData()
{
    // /product/get-home-data

    try {
        const response = await fetch(URL + '/home/get-home-data');

        if (!response.ok) {
            throw new Error(`Error: ${response.status} - ${response.statusText}`);
        }

        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error:', error);
        throw error; // Propagamos el error para que pueda ser manejado en el nivel superior
    }
}
export async function getMenuCategories()
{
    // /product/get-home-data

    try {
        const response = await fetch(URL + '/home/get-menu-categories');

        if (!response.ok) {
            throw new Error(`Error: ${response.status} - ${response.statusText}`);
        }

        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error:', error);
        throw error; // Propagamos el error para que pueda ser manejado en el nivel superior
    }
}

// create-addresses
// addresses
export async function createShippingAddress(token, dataShippingAddress){
    try {
        const response = await fetch(URL + '/addresses/create-addresses', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                // 'Accept': 'application/json'
                'Authorization': `Bearer ${token}`
            },
            // credentials: 'include', // Incluye las cookies automáticamente
            body: JSON.stringify(dataShippingAddress)
        });
        if (!response.ok) {
            throw new Error(`Error: ${response.status} - ${response.statusText}`);
        }

        const data = await response.json();
        return data;
    }catch (error) {
        console.error('Error:', error);
        throw error; // Propagamos el error para que pueda ser manejado en el nivel superior
    }

}
export async function getProducts() {
    try {
        const response = await fetch(URL + '/get-products');

        if (!response.ok) {
            throw new Error(`Error: ${response.status} - ${response.statusText}`);
        }

        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error:', error);
        throw error; // Propagamos el error para que pueda ser manejado en el nivel superior
    }

}

export async function getShippingAddresses(token){
    try {
        const response = await fetch(URL + '/addresses/get-addresses', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            body: null
        });

        if (!response.ok) {
            throw new Error(`Error: ${response.status} - ${response.statusText}`);
        }

        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error:', error);
        throw error; // Propagamos el error para que pueda ser manejado en el nivel superior
    }

}

export async function deleteShippingAddress(token, id){
    try {
        const response = await fetch(URL + '/addresses/delete-address/'+id, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            body: null
        });

        if (!response.ok) {
            throw new Error(`Error: ${response.status} - ${response.statusText}`);
        }

        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error:', error);
        throw error; // Propagamos el error para que pueda ser manejado en el nivel superior
    }
}

export async function updateShippingAddress(token, id, shippingAddress){
    try {
        const response = await fetch(URL + '/addresses/update-address/'+id, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            body: JSON.stringify(shippingAddress)
        });

        if (!response.ok) {
            throw new Error(`Error: ${response.status} - ${response.statusText}`);
        }

        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error:', error);
        throw error; // Propagamos el error para que pueda ser manejado en el nivel superior
    }
}

export async function updateDefaultShippingAddress(token, shippingAddress){
    try {
        const response = await fetch(URL + '/addresses/update-default-address', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            body: JSON.stringify(shippingAddress)
        });

        if (!response.ok) {
            throw new Error(`Error: ${response.status} - ${response.statusText}`);
        }

        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error:', error);
        throw error; // Propagamos el error para que pueda ser manejado en el nivel superior
    }
}

export async function createBillingAddress(token, dataBillingAddress){
    try {
        const response = await fetch(URL + '/billing-addresses/create-addresses-billing', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            body: JSON.stringify(dataBillingAddress)
        });

        if (!response.ok) {
            throw new Error(`Error: ${response.status} - ${response.statusText}`);
        }

        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error:', error);
        throw error; // Propagamos el error para que pueda ser manejado en el nivel superior
    }

}

export async function getBillingAddresses(token){
    try {
        const response = await fetch(URL + '/billing-addresses/get-addresses-billing', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            body: null
        });

        if (!response.ok) {
            throw new Error(`Error: ${response.status} - ${response.statusText}`);
        }

        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error:', error);
        throw error; // Propagamos el error para que pueda ser manejado en el nivel superior
    }

}

export async function deleteBillingAddress(token, id){
    try {
        const response = await fetch(URL + '/billing-addresses/delete-address-billing/'+id, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            body: null
        });

        if (!response.ok) {
            throw new Error(`Error: ${response.status} - ${response.statusText}`);
        }

        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error:', error);
        throw error; // Propagamos el error para que pueda ser manejado en el nivel superior
    }
}

export async function updateBillingAddress(token, id, billingAddress){
    try {
        const response = await fetch(URL + '/billing-addresses/update-address-billing/'+id, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            body: JSON.stringify(billingAddress)
        });

        if (!response.ok) {
            throw new Error(`Error: ${response.status} - ${response.statusText}`);
        }

        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error:', error);
        throw error; // Propagamos el error para que pueda ser manejado en el nivel superior
    }
}

export async function updateDefaultBillingAddress(token, billingAddress){
    try {
        const response = await fetch(URL + '/billing-addresses/update-default-address-billing', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            body: JSON.stringify(billingAddress)
        });

        if (!response.ok) {
            throw new Error(`Error: ${response.status} - ${response.statusText}`);
        }

        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error:', error);
        throw error; // Propagamos el error para que pueda ser manejado en el nivel superior
    }
}

export async function testAuth(token) {
    try {
        const response = await fetch(URL + '/test-auth', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            // credentials: 'include'
        });

        const data = await response.json();
        console.log('Test auth result:', data)
        return data;
    } catch (error) {
        console.error('Test auth error:', error);
    }
}

export async function getOpinions(id ){
        try {
            const response = await fetch(URL + `/product/${id}/opinions`);
            
            const data = await response.json();
            return data;

        } catch (error) {
            console.error('Error:', error);
            throw error;
        }
    }

 export async function storeOpinion (token, newOpinion){
        try {
            console.log(newOpinion)
            const response = await fetch(URL + '/product/opinion', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify(newOpinion)
            });

            const data = await response.json();
            console.log(data)
            return data;
        } catch (error) {
            console.error("Error al agregar opinion:", error);
        }
    }