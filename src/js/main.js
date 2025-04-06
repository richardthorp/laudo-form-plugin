import FileInput from "./components/FileInput";

document.addEventListener('DOMContentLoaded', () => {
  const laudoFormBlock = document.querySelector('.block.laudo-form-block');
  if(!laudoFormBlock) return;

  const fileInputs = laudoFormBlock.querySelectorAll('.gfield--type-fileupload');
  if(fileInputs) {
    fileInputs.forEach(inputWrap => new FileInput(inputWrap));
  }
})