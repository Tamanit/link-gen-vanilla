const submitButton = document.getElementById('submitButton');
const copyButton = document.getElementById('copyButton');
const shortUrlInput = document.getElementById('shortUrlInput');
const userUrl = document.getElementById('userUrl');

copyButton.onclick = () => {
    shortUrlInput.select();
    navigator.clipboard.writeText(shortUrlInput.value);
}
submitButton.onclick = () =>{
  fetch('http://localhost/newToken', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'url=' + encodeURIComponent(userUrl.value)
    }).then(response=>{
        return response.json();
      }
  ).then(data =>{
      shortUrlInput.value = data.token;
  })
}