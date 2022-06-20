const getData = async ()=>{
   let myd = fetch("facebook.com",{
      method:"POST",
      body:JSON.stringify({hello:2,hi:7}),
      headers:{
         "content-type":"aplication/json"
      }
  })
  let data = await myd.json();
  console.log(data)
}


async function loadData() {
   let mydata = JSON.stringify({ id: `${match.params.id}` })
   const fetchresponse = await fetch(`${baseUrl}/api/v1/member/getSingleMemById`, {
     method: 'POST',
     body: mydata,
     headers: {
       'Content-Type': 'application/json',
       // 'Content-Type': 'multipart/form-data'
     },
   })
   const fetcResData = await fetchresponse.json()
   if (fetcResData) {
   }
}