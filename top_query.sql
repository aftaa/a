SELECT count(link_id) as cnt, l.id, l.name FROM link_view lv	join link l
on l.id=link_id
group by l.id
order by cnt desc
limit 10