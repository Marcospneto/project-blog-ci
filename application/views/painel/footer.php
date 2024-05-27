<div class="row" style="margin-top: 5%;">
	<div class="col-md-12">
		<div class="footer text-center bg-primary text-white py-3" style="position: fixed; bottom: 0; width: 100%; background-color: #191c1c">
			<span>&copy; <?php echo date('Y')?> - JVM Desenvolvimento WEB</span>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('#trumbowyg-editor').trumbowyg({
			btns: [
				['viewHTML'],
				['undo', 'redo'], // Only supported in Blink browsers
				['formatting'],
				['strong', 'em', 'del'],
				['superscript', 'subscript'],
				['link'],
				['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
				['unorderedList', 'orderedList'],
				['horizontalRule'],
				['removeformat'],
				['fullscreen'],
				['foreColor', 'backColor']  // Adiciona botões de cor
			],
			plugins: {
				colors: {
					colorList: [
						'ffffff', '000000', 'eeece1', '1f497d', '4f81bd',
						'c0504d', '9bbb59', '8064a2', '4bacc6', 'f79646',
						'ffff00', 'f2f2f2', '7f7f7f', 'ddd9c3', 'c6d9f0',
						'dbe5f1', 'f2dcdb', 'ebf1dd', 'e5e0ec', 'dbeef3',
						'fdeada', 'fff2ca', 'd8d8d8', '595959', 'c4bd97',
						'8db3e2', 'b8cce4', 'e5b9b7', 'd7e3bc', 'ccc1d9',
						'b7dde8', 'fbd5b5', 'ffe694', 'bfbfbf', '3f3f3f',
						'938953', '548dd4', '95b3d7', 'd99694', 'c3d69b',
						'b2a2c7', 'b7dde8', 'fac08f', 'f2c314', 'a5a5a5',
						'262626', '494429', '17365d', '366092', '953734',
						'76923c', '5f497a', '92cddc', 'da7e23', 'e36c09',
						'38761d', '0c343d'
					]
				}
			},
			autogrow: true
		});
	});
</script>

</body>
</html>
