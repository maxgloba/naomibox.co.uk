const cartAction = actionName => {
  return new Promise((resolve, reject) => {
    const
      formData = new FormData(),
      request = new XMLHttpRequest()

    formData.append("action", actionName)
    request.open('POST', data.ajax, true)

    request.onload = () => {
      if (this.status >= 200 && this.status < 400) {
        resolve(this.response)
      }
    }

    request.onerror = () => {
      reject(this.response)
    };

    request.send(formData)
  })
}