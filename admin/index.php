<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: Arial;
    }

    /* Style the tab */
    .tab {
      overflow: hidden;
      border: 1px solid #ccc;
      background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tab button {
      background-color: inherit;
      float: left;
      border: none;
      outline: none;
      cursor: pointer;
      padding: 14px 16px;
      transition: 0.3s;
      font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
      background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
      background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
      display: none;
      padding: 6px 12px;
      border: 1px solid #ccc;
      border-top: none;
    }
    input[type=text] {
      width: 600px;
    }
  </style>
</head>

<body>

  <div class="tab" style="margin-top: 10px;margin-right: 20px;">
    <button class="tablinks" onclick="openTab(event, 'short')">ShortCodes</button>
  </div>

  <div id="short" class="tabcontent active" style="display: block;margin-right: 20px;">
    <h3>Article Filter</h3>
    <p>Can be added to page or post, use shortcode: <b>[article-filter]</b></p>

  </div>
  </form>

</body>

</html>
