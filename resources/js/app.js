require('./bootstrap');

//use Echo.channel for public one

Echo.private("notifications").listen("UserSessionChanged",(event)=>{
    console.log('event',event)
    const notificationElement = document.getElementById("notifications")

    notificationElement.innerText= event.message;
    notificationElement.classList.remove("invisible")
    notificationElement.classList.remove("alert-success")
    notificationElement.classList.remove("alert-danger")
    notificationElement.classList.add(`alert-${event.type}`)


})
