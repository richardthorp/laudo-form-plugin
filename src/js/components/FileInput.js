export default class FileInput {
  constructor(inputWrap) {
    this.inputWrap = inputWrap;
    this.input = this.inputWrap.querySelector('input[type="file"]');

    this.input.addEventListener('change', (e) => {
      // Get the selected file
      const files = e.target.files;
      // If there is a file in the input, get the name and add it to the input wrap
      if(files.length) {
        const fileName = files[0].name;
        const fileNameSpan = document.createElement('span');
        fileNameSpan.classList.add('file-name');
        fileNameSpan.innerHTML = fileName;
        this.inputWrap.appendChild(fileNameSpan);
      }
    })
  }
}