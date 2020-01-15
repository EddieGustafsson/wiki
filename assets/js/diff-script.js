(function() {
  var compare, diff, m, o, updateDiff;

  diff = '';

  o = $('#original');

  m = $('#modified');

  compare = function() {
    diff = JsDiff.createPatch('', o.val() || o.prop('placeholder'), m.val() || m.prop('placeholder'), 'original', 'modified', {
      options: {
        context: $('#contextLines').val()
      }
    });
    console.log(diff);
    updateDiff();
  };

  updateDiff = function() {
    var diff2Html;
    diff2Html = new Diff2HtmlUI({
      diff: diff
    });
    diff2Html.draw('#diff', {
      inputFormat: 'diff',
      outputFormat: $('#outputFormat').val(),
      synchronisedScroll: $('#syncScroll').prop('checked'),
      matching: $('#matchingType').val(),
      matchWordsThreshold: $('#wordThreshold').val(),
      matchingMaxComparisons: $('#maxComparisons').val()
    });
    diff2Html.highlightCode('#diff');
    diff2Html.fileListCloseable('#diff', false);
  };

  $('#original, #modified').on('input', compare);

  $('#contextLines').on('change', compare);

  $('#outputFormat, #syncScroll, #matchingType, #wordThreshold, #maxComparisons').on('change', updateDiff);

  $('#outputFormat').on('change', function() {
    return $('#syncScrollLabel').toggle();
  });

  o.prop('placeholder', 'function example() {\n    return "pizza";\n}');

  m.prop('placeholder', 'function example() {\n    return "pasta";\n}');

  compare();

}).call(this);

//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiIiwic291cmNlUm9vdCI6IiIsInNvdXJjZXMiOlsiPGFub255bW91cz4iXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7QUFBQSxNQUFBLE9BQUEsRUFBQSxJQUFBLEVBQUEsQ0FBQSxFQUFBLENBQUEsRUFBQTs7RUFBQSxJQUFBLEdBQU87O0VBQ1AsQ0FBQSxHQUFJLENBQUEsQ0FBRSxXQUFGOztFQUNKLENBQUEsR0FBSSxDQUFBLENBQUUsV0FBRjs7RUFFSixPQUFBLEdBQVUsUUFBQSxDQUFBLENBQUE7SUFDUixJQUFBLEdBQU8sTUFBTSxDQUFDLFdBQVAsQ0FBbUIsRUFBbkIsRUFDUCxDQUFDLENBQUMsR0FBRixDQUFBLENBQUEsSUFBVyxDQUFDLENBQUMsSUFBRixDQUFPLGFBQVAsQ0FESixFQUVQLENBQUMsQ0FBQyxHQUFGLENBQUEsQ0FBQSxJQUFXLENBQUMsQ0FBQyxJQUFGLENBQU8sYUFBUCxDQUZKLEVBR1AsVUFITyxFQUdLLFVBSEwsRUFHaUI7TUFBQSxPQUFBLEVBQVM7UUFBQSxPQUFBLEVBQVMsQ0FBQSxDQUFFLGVBQUYsQ0FBa0IsQ0FBQyxHQUFuQixDQUFBO01BQVQ7SUFBVCxDQUhqQjtJQUlQLE9BQU8sQ0FBQyxHQUFSLENBQVksSUFBWjtJQUNBLFVBQUEsQ0FBQTtFQU5ROztFQVNWLFVBQUEsR0FBYSxRQUFBLENBQUEsQ0FBQTtBQUNYLFFBQUE7SUFBQSxTQUFBLEdBQVksSUFBSSxXQUFKLENBQWdCO01BQUEsSUFBQSxFQUFNO0lBQU4sQ0FBaEI7SUFDWixTQUFTLENBQUMsSUFBVixDQUFlLE9BQWYsRUFDRTtNQUFBLFdBQUEsRUFBd0IsTUFBeEI7TUFDQSxZQUFBLEVBQXdCLENBQUEsQ0FBRSxlQUFGLENBQWtCLENBQUMsR0FBbkIsQ0FBQSxDQUR4QjtNQUVBLGtCQUFBLEVBQXdCLENBQUEsQ0FBRSxhQUFGLENBQWdCLENBQUMsSUFBakIsQ0FBc0IsU0FBdEIsQ0FGeEI7TUFHQSxRQUFBLEVBQXdCLENBQUEsQ0FBRSxlQUFGLENBQWtCLENBQUMsR0FBbkIsQ0FBQSxDQUh4QjtNQUlBLG1CQUFBLEVBQXdCLENBQUEsQ0FBRSxnQkFBRixDQUFtQixDQUFDLEdBQXBCLENBQUEsQ0FKeEI7TUFLQSxzQkFBQSxFQUF3QixDQUFBLENBQUUsaUJBQUYsQ0FBb0IsQ0FBQyxHQUFyQixDQUFBO0lBTHhCLENBREY7SUFPQSxTQUFTLENBQUMsYUFBVixDQUF3QixPQUF4QjtJQUNBLFNBQVMsQ0FBQyxpQkFBVixDQUE0QixPQUE1QixFQUFxQyxLQUFyQztFQVZXOztFQWFiLENBQUEsQ0FBRSxzQkFBRixDQUF5QixDQUFDLEVBQTFCLENBQTZCLE9BQTdCLEVBQXNDLE9BQXRDOztFQUNBLENBQUEsQ0FBRSxlQUFGLENBQWtCLENBQUMsRUFBbkIsQ0FBc0IsUUFBdEIsRUFBZ0MsT0FBaEM7O0VBQ0EsQ0FBQSxDQUFFLDRFQUFGLENBQStFLENBQUMsRUFBaEYsQ0FBbUYsUUFBbkYsRUFBNkYsVUFBN0Y7O0VBQ0EsQ0FBQSxDQUFFLGVBQUYsQ0FBa0IsQ0FBQyxFQUFuQixDQUFzQixRQUF0QixFQUFnQyxRQUFBLENBQUEsQ0FBQTtXQUFHLENBQUEsQ0FBRSxrQkFBRixDQUFxQixDQUFDLE1BQXRCLENBQUE7RUFBSCxDQUFoQzs7RUFFQSxDQUFDLENBQUMsSUFBRixDQUFPLGFBQVAsRUFBc0IsOENBQXRCOztFQUNBLENBQUMsQ0FBQyxJQUFGLENBQU8sYUFBUCxFQUFzQiw4Q0FBdEI7O0VBRUEsT0FBQSxDQUFBO0FBbENBIiwic291cmNlc0NvbnRlbnQiOlsiZGlmZiA9ICcnXG5vID0gJCgnI29yaWdpbmFsJylcbm0gPSAkKCcjbW9kaWZpZWQnKVxuXG5jb21wYXJlID0gLT5cbiAgZGlmZiA9IEpzRGlmZi5jcmVhdGVQYXRjaCAnJywgXG4gIG8udmFsKCkgfHwgby5wcm9wKCdwbGFjZWhvbGRlcicpLCBcbiAgbS52YWwoKSB8fCBtLnByb3AoJ3BsYWNlaG9sZGVyJyksXG4gICdvcmlnaW5hbCcsICdtb2RpZmllZCcsIG9wdGlvbnM6IGNvbnRleHQ6ICQoJyNjb250ZXh0TGluZXMnKS52YWwoKVxuICBjb25zb2xlLmxvZyBkaWZmXG4gIHVwZGF0ZURpZmYoKVxuICByZXR1cm5cblxudXBkYXRlRGlmZiA9IC0+XG4gIGRpZmYySHRtbCA9IG5ldyBEaWZmMkh0bWxVSShkaWZmOiBkaWZmKVxuICBkaWZmMkh0bWwuZHJhdyAnI2RpZmYnLFxuICAgIGlucHV0Rm9ybWF0OiAgICAgICAgICAgICdkaWZmJ1xuICAgIG91dHB1dEZvcm1hdDogICAgICAgICAgICQoJyNvdXRwdXRGb3JtYXQnKS52YWwoKVxuICAgIHN5bmNocm9uaXNlZFNjcm9sbDogICAgICQoJyNzeW5jU2Nyb2xsJykucHJvcCgnY2hlY2tlZCcpXG4gICAgbWF0Y2hpbmc6ICAgICAgICAgICAgICAgJCgnI21hdGNoaW5nVHlwZScpLnZhbCgpXG4gICAgbWF0Y2hXb3Jkc1RocmVzaG9sZDogICAgJCgnI3dvcmRUaHJlc2hvbGQnKS52YWwoKVxuICAgIG1hdGNoaW5nTWF4Q29tcGFyaXNvbnM6ICQoJyNtYXhDb21wYXJpc29ucycpLnZhbCgpXG4gIGRpZmYySHRtbC5oaWdobGlnaHRDb2RlICcjZGlmZidcbiAgZGlmZjJIdG1sLmZpbGVMaXN0Q2xvc2VhYmxlICcjZGlmZicsIGZhbHNlXG4gIHJldHVyblxuXG4kKCcjb3JpZ2luYWwsICNtb2RpZmllZCcpLm9uICdpbnB1dCcsIGNvbXBhcmVcbiQoJyNjb250ZXh0TGluZXMnKS5vbiAnY2hhbmdlJywgY29tcGFyZVxuJCgnI291dHB1dEZvcm1hdCwgI3N5bmNTY3JvbGwsICNtYXRjaGluZ1R5cGUsICN3b3JkVGhyZXNob2xkLCAjbWF4Q29tcGFyaXNvbnMnKS5vbiAnY2hhbmdlJywgdXBkYXRlRGlmZlxuJCgnI291dHB1dEZvcm1hdCcpLm9uICdjaGFuZ2UnLCAtPiAkKCcjc3luY1Njcm9sbExhYmVsJykudG9nZ2xlKClcblxuby5wcm9wKCdwbGFjZWhvbGRlcicsICdmdW5jdGlvbiBleGFtcGxlKCkge1xcbiAgICByZXR1cm4gXCJwaXp6YVwiO1xcbn0nKVxubS5wcm9wKCdwbGFjZWhvbGRlcicsICdmdW5jdGlvbiBleGFtcGxlKCkge1xcbiAgICByZXR1cm4gXCJwYXN0YVwiO1xcbn0nKVxuXG5jb21wYXJlKCkiXX0=
//# sourceURL=coffeescript