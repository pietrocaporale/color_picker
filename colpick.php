<?php
//https://bgrins.github.io/spectrum/#options-showInitial
?>

<!--<script type="text/javascript" src="jquery-3.5.1.min.js"></script>-->
<script type="text/javascript" src="jquery-1.12.3.min.js"></script>

<script src='spectrum.js'></script>
<link rel='stylesheet' href='spectrum.css' />
<style>
  .sp-picker-container {
    display: block;
  }

  #formRestoreColors {
    width: fit-content;
    margin: 0 auto;
    border: 3px ridge #000;
    line-height: 0.859em;
  }

  #boxbuts {
    display: block;
    padding: 3px;
    margin-top: 10px;
    width: 100%;
    text-align: center;
  }

  .txtnum {
    background: transparent;
    color: #fff;
    width: 50px;
    margin-top: 5px;
  }

  .txtopa {
    background: transparent;
    color: #fff;
    width: 60px;
  }

  .but_picker {
    display: inline-block;
    line-height: 1.5;
    padding: 7px;
    text-align: center;
    color: #fff;
    text-shadow: 1px 1px 1px #000;
    border-radius: 10px;
    background-color: hsl(100.54deg 90.24% 8.04%);
    background-image: linear-gradient(to top left, hsl(0deg 0% 0% / 20%), hsl(0deg 0% 0% / 20%) 30%, hsl(0deg 0% 0% / 0%));
    font-family: inherit;
    font-size: 1.0em;
    letter-spacing: 0px;
    font-weight: normal;
  }
  .but_picker:hover {
    background-color: hsl(100.54deg 90.24% 18.04%);
  }
  .embossed {
    border: none;
    box-shadow: inset 2px 2px 3px rgba(255, 255, 255, 0.6), inset -2px -2px 3px rgba(0, 0, 0, 0.6);
  }

  .embossed:active {
    box-shadow: inset -2px -2px 3px rgba(255, 255, 255, 0.6), inset 2px 2px 3px rgba(0, 0, 0, 0.6);
  }

</style>
<script>
  function esbutmenu(elm) {
    const collection = document.getElementsByClassName("sp-input");
    color_sel = collection[0].value
    form = document.getElementById('formRestoreColors');
    xcol = document.getElementById('color-picker').value;
    form = document.getElementById('formRestoreColors');
    form.setcolor.value = color_sel;
    form.butcolpicker.value = elm.value;

    form.hvar.value = document.getElementById('sethvar').value;
    form.svar.value = document.getElementById('setsvar').value;
    form.lvar.value = document.getElementById('setlvar').value;
    form.ovar.value = document.getElementById('setovar').value;
    form.submit();
  }
</script>

<script>
  $(document).ready(function() {

    $("#color-picker").spectrum({
      color: "<?php echo $color_picker ?>",
      flat: true,
      showInput: true,
      showAlpha: true,
      showSelectionPalette: true,
      showInitial: true,
      showInput: true,
      preferredFormat: "hsl",
      showPalette: true,
      palette: [["White", "Black", "Gray"],
      ["Red", "Yellow", "Blue"], //primary
      ["Orange", "Green", "Violet"], //secondary
      ["OrangeRed", "GreenYellow", "MediumVioletRed", "BlueViolet"], //tertiary
      ["#ec6224","#fdc70f","YellowGreen","#1d96bb","#c31a7f"], //RedOrange,YellowOrange,YellowGreen,BlueGreen,RedViolet
      ["Lime", "", ""],
      ],
      //palette: [[]],
      showButtons: false,
      change: function(color) {
        //$(document.body).css('background-color', color)
      }
    });
    $(".basic").spectrum({
      //color: 'white',
      preferredFormat: 'hex',
      change: function(color) {
        $(".newcolor").css({ "color": color });
      }
    });


  })
</script>

<form id='formRestoreColors' method="post" action="<?php echo $root; ?>">
  <input type="hidden" id="hvar" name="hvar" value="">
  <input type="hidden" id="svar" name="svar" value="">
  <input type="hidden" id="lvar" name="lvar" value="">
  <input type="hidden" id="ovar" name="ovar" value="">

  <input type="hidden" id="setcolor" name="setcolor" value="">
  <input type="hidden" id="butcolpicker" name="butcolpicker" value="">
  <input type='text' id='color-picker' name='color_picker' value="" />
</form>
<div id="boxbuts">
  <label>Variation</label><br>
  <label for="hvar">hue</label>
  <input type="number" class="txtnum" id="sethvar" placeholder="hue" value="<?php echo $hvar; ?>">
  <label for="svar">sat</label>
  <input type="number" class="txtnum" id="setsvar" placeholder="sat" value="<?php echo $svar; ?>">
  <label for="lvar">lum</label>
  <input type="number" class="txtnum" id="setlvar" placeholder="lum" value="<?php echo $lvar; ?>">
  <label for="ovar">opa</label>
  <input type="number" class="txtopa" id="setovar" placeholder="opa" step=".01" value="<?php echo $ovar; ?>">
</div>
<div id="boxbuts">
  <?php echo "set: $setcolor<br><br>"; ?>
  <button class="but_picker embossed" type="button" value="Cancel" onclick="esbutmenu(this)">Cancel</button>
  <button class="but_picker embossed" type="button" value="Choose" onclick="esbutmenu(this)">Choose</button>
</div>



<?php
/*
    'Pink'                      => '#FFC0CB',
    'Brown'                     => '#A52A2A',
    'Gold'                      => '#FFD700',
    'Fuchsia'                   => '#FF00FF',
    'Cyan'                      => '#00FFFF',
    'Beige'                     => '#F5F5DC',
    'Ivory'                     => '#FFFFF0',
    'Khaki'                     => '#F0E68C',
    'Magenta'                   => '#FF00FF',
    'Maroon'                    => '#800000',
    'Lavender'                  => '#E6E6FA',
    'Lime'                      => '#00FF00',
    'Navy'                      => '#000080',
    'Olive'                     => '#808000',
    'Orchid'                    => '#DA70D6',
    'Plum'                      => '#DDA0DD',
    'Purple'                    => '#800080',
    'Salmon'                    => '#FA8072',
    'Sienna'                    => '#A0522D',
    'Silver'                    => '#C0C0C0',
    'SkyBlue'                   => '#87CEEB',
    'SpringGreen'               => '#00FF7F',
    'Tomato'                    => '#FF6347',
    'Turquoise'                 => '#40E0D0',
    'Wheat'                     => '#F5DEB3',
    'WhiteSmoke'                => '#F5F5F5',
    'YellowGreen'               => '#9ACD32',
    'Aquamarine'                => '#7FFFD4',
    'Bisque'                    => '#FFE4C4',
    'Chocolate'                 => '#D2691E',
    'Coral'                     => '#FF7F50',
*/
?>
