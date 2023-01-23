/**
 * Function that does substring reversal.
 *
 * @param st
 *  Input string.
 * @param a
 *  Substring starting index.
 * @param b
 *  Substring ending index.
 * @returns {string}
 *  Result of input string with reversed substring.
 */
function solve(st,a,b){
    let subStr = st.slice(a,++b)
    let reverseStr = subStr.split('').reverse().join('')
    return st.split(subStr).join(reverseStr)
}
