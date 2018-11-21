import { setCategory } from './categories';
import { setSearchString } from './search';

export const resetFilters = () => dispatch => {
    dispatch(setCategory(0));
    dispatch(setSearchString(""))
}