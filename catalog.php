if ($result['image']) {
                        $image = $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']);
                    } else {
                        $image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
                    }
                    
                    $data['configblog_review_status'] = $this->config->get('configblog_review_status');

                    if ($this->config->get('configblog_review_status')) {
                        $rating = $result['rating'];
                    } else {
                        $rating = false;
                    }

                    $data['articles'][] = array(
                        'article_id'  => $result['article_id'],
                        'thumb'       => $image,
                        'name'        => $result['name'],
                        'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('configblog_article_description_length')) . '..',
                        'date_added'  => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
                        'viewed'      => $result['viewed'],
                        'reviews'    => sprintf($this->language->get('text_reviews'), (int)$result['reviews']),
                        'rating'      => $rating,
                        'href'        => $this->url->link('blog/article', 'article_id=' . $result['article_id']),
                    );

Не мастер php. есть ли решение? смена версии PHP с 7.4 на 7.1 как подсказывали проблемы не решила(сайт вообще лег, на 7.4 встал и пошел, но хромает так же((
