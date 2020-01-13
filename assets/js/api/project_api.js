import { fetchJson } from './api';

export function getProjects() {
    return fetchJson('/projects')
        .then(data => data);
}