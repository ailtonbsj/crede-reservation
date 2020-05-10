# Default permissions


```sql
INSERT INTO public.permissions(username, module, c, r, u, d, priority, gid) VALUES ('user.name', 'activities', false, true, false, false, 60, 1001001000);
INSERT INTO public.permissions(username, module, c, r, u, d, priority, gid) VALUES ('user.name', 'categories', false, true, false, false, 10, 1001001000);
INSERT INTO public.permissions(username, module, c, r, u, d, priority, gid) VALUES ('user.name', 'equipments', false, true, false, false, 40, 1001001000);
INSERT INTO public.permissions(username, module, c, r, u, d, priority, gid) VALUES ('user.name', 'equipments_activities', false, true, false, false, 39, 1001001000);
INSERT INTO public.permissions(username, module, c, r, u, d, priority, gid) VALUES ('user.name', 'equipments_my_activities', true, true, true, true, 38, 1001001000);
INSERT INTO public.permissions(username, module, c, r, u, d, priority, gid) VALUES ('user.name', 'my_activities', true, true, true, true, 50, 1001001000);
INSERT INTO public.permissions(username, module, c, r, u, d, priority, gid) VALUES ('user.name', 'places', false, true, false, false, 20, 1001001000);
INSERT INTO public.permissions(username, module, c, r, u, d, priority, gid) VALUES ('user.name', 'schedule', false, true, false, false, 70, 1001001000);

```