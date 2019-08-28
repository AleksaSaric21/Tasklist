export function login(credentials) {
    return new Promise((res,rej) =>{
        axios.post('api/login', credentials)
            .then((response)=>{
                res(response.data);
                console.log(response.data);
            })
            .catch((err)=>{
                rej('Wrong email or password');
            })
    })
}

export function getlocalUser() {
    const userStr = localStorage.getItem("user");

    if (!userStr){
        return null;
    }
    return JSON.parse(userStr);
}