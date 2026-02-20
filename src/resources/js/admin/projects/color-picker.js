/**
 * Keeps the read-only hex text input in sync with the native color picker.
 * Expects the page to have:
 *   <input type="color" id="color">
 *   <input type="text"  id="color_hex" readonly>
 */
document.addEventListener('DOMContentLoaded', function () {
    const colorInput = document.getElementById('color');
    const colorHex   = document.getElementById('color_hex');

    if (colorInput && colorHex) {
        colorInput.addEventListener('input', function () {
            colorHex.value = this.value;
        });
    }
});
