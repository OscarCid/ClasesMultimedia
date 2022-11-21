<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script type="text/javascript" src="https://www.jqwidgets.com/jquery-widgets-demo/scripts/format.js"></script>
<script type="text/javascript" src="https://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/jqxcore.js"></script>
<script type="text/javascript" src="https://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/jqxbuttons.js"></script>
<script type="text/javascript" src="https://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/jqxscrollbar.js"></script>
<script type="text/javascript" src="https://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/jqxlistbox.js"></script>
<script type="text/javascript" src="https://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/jqxdropdownlist.js"></script>
<script type="text/javascript" src="https://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/jqxtabs.js"></script>
<script type="text/javascript" src="https://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/jqxqrcode.js"></script>
<script type="text/javascript" src="https://www.jqwidgets.com/jquery-widgets-demo/scripts/demofunctions.js"></script>
<script type="text/javascript">
		window.onload = function () {
			const qrcodes = [...document.querySelectorAll('.qrcode')];
			for (let i = 0; i < qrcodes.length; i++) {
				const qrcodeElement = qrcodes[i];
				const renderAs = qrcodeElement.getAttribute('render-as') || 'svg';
				const displayLabel = qrcodeElement.hasAttribute('display-label') ? true : false;
				const value = qrcodeElement.getAttribute('value');
				const labelPosition = qrcodeElement.getAttribute('label-position') || 'bottom';
				const errorLevel = qrcodeElement.getAttribute('error-level') || 'L';
				const embedImage = qrcodeElement.getAttribute('embed-image') || '';
				// create Barcode component
				new jqxQRcode(qrcodeElement, {
					renderAs: renderAs,
					value: value,
					errorLevel: errorLevel,
					labelPosition: labelPosition,
					embedImage: embedImage,
					imageWidth: 40,
					imageHeight: 60,
					displayLabel: displayLabel
				});
			}
		}
	</script>
<!-- -->
<?php
    if ((isset($script)))
    {
        foreach ($script as $script)
        {
            echo $script;
            echo "\n";
        }
    }
?>
</body>
</html>