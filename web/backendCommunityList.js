jQuery(function($) {
  $('#body > table').each(function() {
    var actionsList, url, html;

    actionsList = $(this).find('tr:last ul');
    url = actionsList.find('li:first a').attr('href')
      .replace(
        /community\/delete\/id\/([0-9]+)$/,
        'communityDesign/edit/$1'
      );
    html = '<li><a href="' + url + '">個別デザイン設定</a></li>';

    actionsList.append(html);
  });
});
