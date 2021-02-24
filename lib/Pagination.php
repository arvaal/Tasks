<?php

namespace lib;

class Pagination {

    public $total = 0;
    public $page = 1;
    public $limit = 20;
    public $num_links = 10;
    public $url = '';
    public $text = 'Showing {start} to {end} of {total} ({pages} Pages)';
    public $text_first = '&lt;&lt;';
    public $text_last = '&gt;&gt;';
    public $text_next = '&gt;';
    public $text_prev = '&lt;';
    public $style_links = 'pagination';
    public $style_results = 'results';

    public function render() {
        $total = $this->total;

        if ($this->page < 1) {
            $page = 1;
        } else {
            $page = $this->page;
        }

        if (!(int) $this->limit) {
            $limit = 10;
        } else {
            $limit = $this->limit;
        }

        $num_links = $this->num_links;
        $num_pages = ceil($total / $limit);

        $output = '';

        if ($page > 1) {
            $tmp_url = str_replace('&amp;', '&', $this->url);
            $output .= ' <li class="page-item"><a class="page-link" href="' . str_replace('&', '&amp;', rtrim(str_replace('{page}', 1, $tmp_url), '?&')) . '">' . $this->text_first . '</a></li>';
            if ($page == 2) {
                $output .= '<li class="page-item"><a class="page-link" href="' . str_replace('&', '&amp;', rtrim(str_replace('{page}', $page - 1, $tmp_url), '?&')) . '">' . $this->text_prev . '</a></li>';
            } elseif ($page > 1) {
                $output .= '<li class="page-item"><a class="page-link" href="' . str_replace('{page}', $page - 1, $this->url) . '">' . $this->text_prev . '</a></li>';
            }
        }

        if ($num_pages > 1) {
            if ($num_pages <= $num_links) {
                $start = 1;
                $end = $num_pages;
            } else {
                $start = $page - floor($num_links / 2);
                $end = $page + floor($num_links / 2);

                if ($start < 1) {
                    $end += abs($start) + 1;
                    $start = 1;
                }

                if ($end > $num_pages) {
                    $start -= ($end - $num_pages);
                    $end = $num_pages;
                }
            }

            if ($start > 1) {
                $output .= ' .... ';
            }

            for ($i = $start; $i <= $end; $i++) {
                if ($page == $i) {
                    $output .= ' <li class="page-item"><b class="page-link">' . $i . '</b></li> ';
                } elseif ($i == 1) {
                    $output .= ' <li class="page-item"><a class="page-link" href="' . str_replace('&', '&amp;', rtrim(str_replace('{page}', 1, $tmp_url), '?&')) . '">' . $i . '</a></li>';
                } else {
                    $output .= ' <li class="page-item"><a class="page-link" href="' . str_replace('{page}', $i, $this->url) . '">' . $i . '</a></li>';
                }
            }

            if ($end < $num_pages) {
                $output .= ' .... ';
            }
        }

        if ($page < $num_pages) {
            $output .= '<li class="page-item"><a class="page-link" href="' . str_replace('{page}', $page + 1, $this->url) . '">' . $this->text_next . '</a></li> <li><a class="page-link" href="' . str_replace('{page}', $num_pages, $this->url) . '">' . $this->text_last . '</a></li> ';
        }

        $find = array(
            '{start}',
            '{end}',
            '{total}',
            '{pages}'
        );

        $replace = array(
            ($total) ? (($page - 1) * $limit) + 1 : 0,
            ((($page - 1) * $limit) > ($total - $limit)) ? $total : ((($page - 1) * $limit) + $limit),
            $total,
            $num_pages
        );

        return ($output ? '<div class="bd-example"><nav aria-label="..."><ul class="' . $this->style_links . '">' . $output . '</ul></nav><?div>' : '') . '<div class="' . $this->style_results . '">' . str_replace($find, $replace, $this->text) . '</div>';
    }

}
