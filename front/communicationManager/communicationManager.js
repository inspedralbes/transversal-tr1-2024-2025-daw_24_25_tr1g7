const URL = "http://localhost:8000/api"
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

export async function getHomeData()
{
    // /product/get-home-data

    try {
        const response = await fetch(URL + '/product/get-home-data');

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

export async function jsonProductes (){
    return [
        {
            id:1,
            name:'Procesador 1 lorem',
            img_path:'https://thumb.pccomponentes.com/w-530-530/articles/17/179806/244-logitech-g502-hero-raton-gaming-16000dpi-caracteristicas.jpg',
            description: 'descripcion lorem',
            stock:40,
            price:120.00,
            valoraciones: 4.5,
            opiniones: [
                {
                    id:1,
                    message:"lorem"
                },
                {
                    id:2,
                    message:"lorem"
                },
                {
                    id:3,
                    message:"lorem"
                },
                {
                    id:4,
                    message:"lorem"
                }
                ]
        },
        {
            id:2,
            name:'Procesador 2 lorem',
            img_path:'https://thumb.pccomponentes.com/w-530-530/articles/17/179806/244-logitech-g502-hero-raton-gaming-16000dpi-caracteristicas.jpg',
            description: 'descripcion lorem',
            stock:40,
            price:70.00,
            valoraciones: 4.5,
            opiniones: [
                {
                    id:1,
                    message:"lorem"
                },
                {
                    id:2,
                    message:"lorem"
                },
                {
                    id:3,
                    message:"lorem"
                },
                {
                    id:4,
                    message:"lorem"
                }
            ]
        },
        {
            id:3,
            name:'Procesador 3 lorem',
            img_path:'https://thumb.pccomponentes.com/w-530-530/articles/17/179806/244-logitech-g502-hero-raton-gaming-16000dpi-caracteristicas.jpg',
            description: 'descripcion lorem',
            stock:40,
            price:50.00,
            valoraciones: 4.5,
            opiniones: [
                {
                    id:1,
                    message:"lorem"
                },
                {
                    id:2,
                    message:"lorem"
                },
                {
                    id:3,
                    message:"lorem"
                },
                {
                    id:4,
                    message:"lorem"
                }
            ]
        },
        {
            id:4,
            name:'Procesador 4 lorem',
            img_path:'https://thumb.pccomponentes.com/w-530-530/articles/17/179806/244-logitech-g502-hero-raton-gaming-16000dpi-caracteristicas.jpg',
            description: 'descripcion lorem',
            stock:40,
            price:150.00,
            valoraciones: 4.5,
            opiniones: [
                {
                    id:1,
                    message:"lorem"
                },
                {
                    id:2,
                    message:"lorem"
                },
                {
                    id:3,
                    message:"lorem"
                },
                {
                    id:4,
                    message:"lorem"
                }
            ]
        },
        {
            id:5,
            name:'Procesador 5 lorem',
            img_path:'https://thumb.pccomponentes.com/w-530-530/articles/17/179806/244-logitech-g502-hero-raton-gaming-16000dpi-caracteristicas.jpg',
            description: 'descripcion lorem',
            stock:40,
            price:250.00,
            valoraciones: 4.5,
            opiniones: [
                {
                    id:1,
                    message:"lorem"
                },
                {
                    id:2,
                    message:"lorem"
                },
                {
                    id:3,
                    message:"lorem"
                },
                {
                    id:4,
                    message:"lorem"
                }
            ]
        },
        {
            id:6,
            name:'Procesador 6 lorem',
            img_path:'https://thumb.pccomponentes.com/w-530-530/articles/17/179806/244-logitech-g502-hero-raton-gaming-16000dpi-caracteristicas.jpg',
            description: 'descripcion lorem',
            stock:40,
            price:50.00,
            valoraciones: 4.5,
            opiniones: [
                {
                    id:1,
                    message:"lorem"
                },
                {
                    id:2,
                    message:"lorem"
                },
                {
                    id:3,
                    message:"lorem"
                },
                {
                    id:4,
                    message:"lorem"
                }
            ]
        }
        ]
}