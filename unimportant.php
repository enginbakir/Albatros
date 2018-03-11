<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  .accordionm {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
  }

  .active, .accordionm:hover {
    background-color: #ccc;
  }

  .panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
  }

  .accordion1Header {
    border: 1px solid #2F4F4F;
    color: white;
    background-color: #437C17;
    font-family: Arial, Sans-Serif;
    font-size: 12px;
    font-weight: bold;
    padding: 5px;
    margin-top: 5px;
    cursor: pointer;
  }
  .accordion1HeaderSelected {
    border: 1px solid #2F4F4F;
    color: white;
    background-color: #4AA02C;
    font-family: Arial, Sans-Serif;
    font-size: 12px;
    font-weight: bold;
    padding: 5px;
    margin-top: 5px;
    cursor: pointer;
  }
  .accordion1Content {
    background-color: #d1facc;
    border: 1px dashed #2F4F4F;
    border-top: none;
    padding: 5px;
    padding-top: 10px;
  }
  .accordionHeader {
    border: 1px solid #2F4F4F;
    color: white;
    background-color: #2E4d7B;
    font-family: Arial, Sans-Serif;
    font-size: 12px;
    font-weight: bold;
    padding: 5px;
    margin-top: 5px;
    cursor: pointer;
  }
  .accordionHeaderSelected {
    border: 1px solid #2F4F4F;
    color: white;
    background-color: #5078B3;
    font-family: Arial, Sans-Serif;
    font-size: 12px;
    font-weight: bold;
    padding: 5px;
    margin-top: 5px;
    cursor: pointer;
  }
  .accordionContent {
    background-color: #D3DEEF;
    border: 1px dashed #2F4F4F;
    border-top: none;
    padding: 5px;
    padding-top: 10px;
  }

</style>
</head>
<body>

  <button class="accordionm">Section 1</button>
  <div class="panel">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
  </div>

  <button class="accordionm">Section 2</button>
  <div class="panel">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
  </div>
  <input type="hidden" >
  <button class="accordionm">Section 3</button>
  <div class="panel">
    <table>
      <tbody>
        <tr>
          <th scope="col">KAZANIMLAR</th>
          <th scope="col">EVET</th>
          <th scope="col">HAYIR</th>
          <th scope="col">ACIKLAMA</th>
        </tr>
        <tr>
          <td>Yazı araç-gereçlerini tanır.</td>
          <td>Yazı araç-gereçlerini tanır.</td>
          <td>Yazı araç-gereçlerini tanır.</td>
          <td>Yazı araç-gereçlerini tanır.</td>
        </tr>
        <tr>
          <td>Yazı araç-gereçlerini tanır.</td>
          <td>Yazı araç-gereçlerini tanır.</td>
          <td>Yazı araç-gereçlerini tanır.</td>
          <td>Yazı araç-gereçlerini tanır.</td>
        </tr>
        <tr>
          <td>Yazı araç-gereçlerini tanır.</td>
          <td>Yazı araç-gereçlerini tanır.</td>
          <td>Yazı araç-gereçlerini tanır.</td>
          <td>Yazı araç-gereçlerini tanır.</td>
        </tr>
        <tr>
          <td>Yazı araç-gereçlerini tanır.</td>
          <td>Yazı araç-gereçlerini tanır.</td>
          <td>Yazı araç-gereçlerini tanır.</td>
          <td>Yazı araç-gereçlerini tanır.</td>
        </tr>
        <tr>
          <td>Yazı araç-gereçlerini tanır.</td>
          <td>Yazı araç-gereçlerini tanır.</td>
          <td>Yazı araç-gereçlerini tanır.</td>
          <td>Yazı araç-gereçlerini tanır.</td>
        </tr>
        <tr>
          <td>Yazı araç-gereçlerini tanır.</td>
          <td>Yazı araç-gereçlerini tanır.</td>
          <td>Yazı araç-gereçlerini tanır.</td>
          <td>Yazı araç-gereçlerini tanır.</td>
        </tr>
      </tbody>
    </table>
  </div>

  <script>
    var acc = document.getElementsByClassName("accordionm");
    var i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight){
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
        } 
      });
    }
  </script>

</body>
</html>
